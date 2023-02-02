
import Api from '../api/api'
import {ExperienceSector} from "../types/types";

export default {
    async add(experienceSector){
        const response = await Api().post('experience/sectors',{
            experience_id:experienceSector.experienceId,
            sector_id:experienceSector.sectorId
        })
        return response.data.data.sector;
    },

    async update(experienceSector){
        const response = await Api().patch(
            `experience/sectors/${experienceSector.id}`,
            {experience_id:experienceSector.experienceId,sector_id:experienceSector.sectorId}
        )
        return response.data.data.experience_sector
    },

    async getAll(){
        return await Api().get('experience/sectors').then((response) => {
            return response.data.data.experience_sectors
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`experience/sectors/${id}`).then((response)=>{
            return response.data.data.experience_sector;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(experienceSector:ExperienceSector){
        return  await Api().delete(`experience/sectors/${experienceSector.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

