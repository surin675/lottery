<template>
<div>
    <div class="form-group m-form__group">
        <a class="btn btn-primary" v-on:click="randomPrizes()">
            สุ่มรางวัล
        </a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr align="center">
                <th scope="col" width="10%">ลำดับที่</th>
                <th scope="col">รางวัล</th>
                <th scope="col">หมายเลข</th>
            </tr>
        </thead>
        <tbody>
           <tr v-for="(item, index) in lps" :key="item.id">
                <td align="center">{{ (index+1) }}</td>
                <td>{{ item.prize.prize_name }}</td>
                <td align="center">{{ item.number }}</td>
           </tr> 
        </tbody>
    </table>
</div>
</template>
<script>
    export default{
        data() {
            return {
                lps: []
            }
        },
        created() {
            axios.get(APP_URL + '/api/lottery').then((response) => {                
                this.lps = response.data
            }).catch((error) => {
                // alert(error);
            });
        },
        methods: {
            randomPrizes: function () {
                axios.get(APP_URL + '/api/lottery/randomPrizes').then((response) => {                
                    this.lps = response.data
                }).catch((error) => {
                    // alert(error);
                });
            }
        }
    }
</script>