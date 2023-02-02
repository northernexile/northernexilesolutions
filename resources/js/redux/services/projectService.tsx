
import Api from '../api/api'
import {Experience, Project} from "../types/types";

export default {
    async add(project){
        const response = await Api().post('project',{
            experience_id:project.experienceId,
            description:project.description
        })
        return response.data.data.experience;
    },

    async update(project){
        return await Api().patch(`project/${project.id}`,{
            experience_id:project.experienceId,
            description:project.description
        }).then((response) => {
            return response.data.data.experience
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAllByExperienceId(experienceId){
        return await Api().get('project',{params:{experience_id:experienceId}}).then((response) => {
            return response.data.data.projects
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`project/${id}`).then((response)=>{
            return response.data.data.project;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(project:Project){
        return  await Api().delete(`project/${project.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

