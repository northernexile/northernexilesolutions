
import Api from '../api/api'
import {Technology} from "../types/types";

export default {
    async add(name){
        const response = await Api().post('skills',{name:name})
        return response.data.data.technology;
    },

    async update(technology){
        const response = await Api().patch(
            `skills/${technology.id}`,
            {name:technology.name}
        )
        return response.data.data.technology
    },

    async getAllTechnologies(){
        return await Api().get('skills').then((response) => {
            return response.data.data.technologies
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`skills/${id}`).then((response)=>{
            return response.data.data.technology;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(technology:Technology){
        return  await Api().delete(`skills/${technology.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

