import Api from "../api/api";

export default {
    async getAll(){
        return await Api().get('chart/all').then((response) => {
            return response.data.data.charts
        }).catch((error)=>{
            return error.response.data
        });
    },

    async getFrameworks(){
        return await Api().get('chart/frameworks').then((response) => {
            return response.data.data.chart
        }).catch((error)=>{
            return error.response.data
        });
    },

    async getSectors(){
        return await Api().get('chart/sectors').then((response) => {
            return response.data.data.chart
        }).catch((error)=>{
            return error.response.data
        });
    },
}
