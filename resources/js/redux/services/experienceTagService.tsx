
import Api from '../api/api'
import {ExperienceTag} from "../types/types";

export default {
    async add(experienceTag){
        const response = await Api().post('experience/tag',{
            experience_id:experienceTag.experienceId,
            tag_id:experienceTag.tagId
        })
        return response.data.data.experience_tag;
    },

    async update(experienceTag){
        const response = await Api().patch(
            `experience/tag/${experienceTag.id}`,
            {experience_id:experienceTag.experienceId,tag_id:experienceTag.tagId}
        )
        return response.data.data.experience_tag
    },

    async toggle(experienceId,tagId){
        return await Api().post(
            `experience/tag/toggle/`,
            {experience_id:experienceId,skill_id:tagId}
        ).then((response)=>{
            return response.data.data.technology
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('experience/tag').then((response) => {
            return response.data.data.experience_tags
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`experience/tag/${id}`).then((response)=>{
            return response.data.data.experience_tag;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(experienceTag:ExperienceTag){
        return  await Api().delete(`experience/tag/${experienceTag.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

