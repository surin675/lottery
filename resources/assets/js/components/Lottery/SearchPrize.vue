<template>
<div>
    <div class="form-group m-form__group">
        <label>กรุณากรอกเลข 3 หลักของท่าน</label>
        <input type="number" class="form-control m-input" v-model="number"> 
    </div>
    <div class="form-group m-form__group">
        <a class="btn btn-primary" v-on:click="searchPrize(number)">
            ตรวจรางวัล
        </a>
    </div>
    <div class="text-center">
        <h1>{{ result }}</h1>
    </div>
</div>
</template>
<script>
    export default{
        data() {
            return {
                number: 'x',
                result: ''
            }
        },
        methods: {
            searchPrize: function (number) {
                axios.get(APP_URL + '/api/lottery/searchPrize/' + number).then((response) => {                
                    this.result = response.data
                }).catch((error) => {
                    // alert(error);
                });
            }
        }
    }
</script>