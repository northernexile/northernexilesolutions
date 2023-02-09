import Api from "../api/api";

export default {
    async getFrameworks(){
        return await Api().get('chart/frameworks').then((response) => {
            return response.data.data.chart
        }).catch((error)=>{
            return error.response.data
        });
    },
}
