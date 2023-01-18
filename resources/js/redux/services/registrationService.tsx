
import Api from '../api/api'

export default {

    async register(name,email,password){
        const response = await Api().post(`auth/register`,{name:name,email:email,password:password})
        return response.data.data.authentication
    }
}
