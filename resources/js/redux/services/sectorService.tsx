
import Api from '../api/api'
import {Sector} from "../types/types";

export default {
    async add(name){
        const response = await Api().post('sectors',{name:name})
        return response.data.data.sector;
    },

    async update(sector){
        const response = await Api().patch(
            `sectors/${sector.id}`,
            {name:sector.name}
        )
        return response.data.data.sector
    },

    async getAllSectors(){
        return await Api().get('sectors').then((response) => {
            return response.data.data.sectors
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`sectors/${id}`).then((response)=>{
            return response.data.data.sector;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(sector:Sector){
        return  await Api().delete(`sectors/${sector.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

