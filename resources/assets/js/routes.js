
import LotteryPrize from './components/Lottery/LotteryPrize.vue';
import SearchPrize from './components/Lottery/SearchPrize.vue';

export const routes = [

    {
        path: '/lottery',
        component: LotteryPrize
    },
    {
        path: '/lottery/search',
        component: SearchPrize
    }
];
