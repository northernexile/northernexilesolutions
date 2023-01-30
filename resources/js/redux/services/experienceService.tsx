
import Api from '../api/api'
import {Experience} from "../types/types";
import experience from "../types/experience";

export default {
    async add(experience){
        const response = await Api().post('experience',{
            name:experience.name,
            company:experience.company,
            description:experience.description,
            start:experience.start,
            stop:experience.stop
        })
        return response.data.data.experience;
    },

    async update(experience){
        const response = await Api().patch(`experience/${experience.id}`,{
            name:experience.name,
            company:experience.company,
            description:experience.description,
            start:experience.start,
            stop:experience.stop
        })
        return response.data.data.contact
    },

    async getAll(){
        return await Api().get('experience').then((response) => {
            return response.data.data.experience
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

