
import Api from '../api/api'
import {Experience} from "../types/types";

export default {
    async add(experience){
        const response = await Api().post('experience',{
            company:experience.company,
            title:experience.title,
            description:experience.description,
            start:experience.start,
            stop:experience.stop
        })
        return response.data.data.experience;
    },

    async update(experience){
        return await Api().patch(`experience/${experience.id}`,{
            title:experience.title,
            company:experience.company,
            description:experience.description,
            start:experience.start,
            stop:experience.stop
        }).then((response) => {
            return response.data.data.experience
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('experience').then((response) => {
            return response.data.data.experiences
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`experience/${id}`).then((response)=>{
            return response.data.data.experience;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(experience:Experience){
        return  await Api().delete(`experience/${experience.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

