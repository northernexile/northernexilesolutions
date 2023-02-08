
import Api from '../api/api'
import {ExperienceSector} from "../types/types";

export default {
    async add(experienceSector){
        const response = await Api().post('experience/sector',{
            experience_id:experienceSector.experienceId,
            sector_id:experienceSector.sectorId
        })
        return response.data.data.sector;
    },

    async update(experienceSector){
        const response = await Api().patch(
            `experience/sector/${experienceSector.id}`,
            {experience_id:experienceSector.experienceId,sector_id:experienceSector.sectorId}
        )
        return response.data.data.experience_sector
    },

    async toggle(experienceId,sectorId){
        return await Api().post(
            `experience/sector/toggle/`,
            {experience_id:experienceId,sector_id:sectorId}
        ).then((response)=>{
            return response.data.data.sector
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('experience/sector').then((response) => {
            return response.data.data.experienceSectors
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`experience/sector/${id}`).then((response)=>{
            return response.data.data.experience_sector;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(experienceSector:ExperienceSector){
        return  await Api().delete(`experience/sector/${experienceSector.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

