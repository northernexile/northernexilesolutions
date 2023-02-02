

import Api from '../api/api'

export default {

    async getAllTechnologies(){
        return await Api().get('skills/types').then((response) => {
            return response.data.data.skills
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`skills/types/${id}`).then((response)=>{
            return response.data.data.skillType;
        }).catch((error) => {
            return error.response.data
        })

    },
}

