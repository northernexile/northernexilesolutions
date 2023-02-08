
import Api from '../api/api'
import {Experience, Project} from "../types/types";

export default {
    async add(project){
        return  await Api().post('project',{
            experience_id:project.experienceId,
            description:project.description
        }).then((response) => {
            return response.data.data.project
        }) .catch((error) => {
            return error.response.data
        })
    },

    async update(project){
        return await Api().patch(`project/${project.id}`,{
            experience_id:project.experienceId,
            description:project.description
        }).then((response) => {
            return response.data.data.project
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAllByExperienceId(experience){
        let params = {experience_id:experience.id}

        return await Api().get('project',{params})
            .then((response) => {
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

