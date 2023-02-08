
import Api from '../api/api'
import {ExperienceTechnology} from "../types/types";

export default {
    async add(experienceTechnology){
        const response = await Api().post('experience/skills',{
            experience_id:experienceTechnology.experienceId,
            skill_id:experienceTechnology.skillId
        })
        return response.data.data.technology;
    },

    async update(experienceTechnology){
        const response = await Api().patch(
            `experience/skills/${experienceTechnology.id}`,
            {experience_id:experienceTechnology.experienceId,skill_id:experienceTechnology.skillId}
        )
        return response.data.data.experience_technology
    },

    async toggle(experienceId,technologyId){
        return await Api().post(
            `experience/skills/toggle/`,
            {experience_id:experienceId,skill_id:technologyId}
        ).then((response)=>{
            return response.data.data.technology
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAllTechnologies(experience){
        return await Api().get('experience/skills',{params:{experience_id:experience.id}}).then((response) => {
            return response.data.data.technologies
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`experience/skills/${id}`).then((response)=>{
            return response.data.data.experience_technology;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(experienceTechnology:ExperienceTechnology){
        return  await Api().delete(`experience/skills/${experienceTechnology.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

