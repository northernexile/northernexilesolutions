
import Api from '../api/api'
import {Tag} from "../types/types";

export default {
    async add(name){
        const response = await Api().post('tag',{name:name})
        return response.data.data.tag;
    },

    async update(tag){
        const response = await Api().patch(
            `tag/${tag.id}`,
            {name:tag.name}
        )
        return response.data.data.tag
    },

    async getAll(){
        return await Api().get('tag').then((response) => {
            return response.data.data.tags
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`tag/${id}`).then((response)=>{
            return response.data.data.tag;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(tag:Tag){
        return  await Api().delete(`tag/${tag.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

