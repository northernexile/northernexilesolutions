
import Api from '../api/api'
import {Technology} from "../types/types";

export default {
    async add(name){
        return  await Api().post('skills',{name:name})
            .then((response)=>{return response.data.data.skill})
            .catch((error)=>{error.response.data})
    },

    async update(technology){
        return  await Api().patch(
            `skills/${technology.id}`,
            {name:technology.name}
        ).then((response)=>{return response.data.data.skill})
            .catch((error)=>{return error.response.data})

    },

    async getAllTechnologies(){
        return await Api().get('skills').then((response) => {
            return response.data.data.skills
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`skills/${id}`).then((response)=>{
            return response.data.data.skill;
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

