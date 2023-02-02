
import Api from '../api/api'
import {Sector} from "../types/types";

export default {
    async add(name){
        return await Api().post('sectors',{name:name})
            .then((response) => {
                return response.data.data.sector;
            }).catch((error) => {
                return error.response.data
            })
    },

    async update(sector){
        return  await Api().patch(
            `sectors/${sector.id}`,
            {name:sector.name}
        ).then((response) => {
            return response.data.data.sector
        }).catch((error) => {
            return error.response.data
        })
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

