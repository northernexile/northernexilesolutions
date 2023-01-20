
import Api from '../api/api'

export default {

    async register(name,email,password,confirmed){
        const response = await Api().post(
            `auth/register`,
            {name:name,email:email,password:password,password_confirmation:confirmed})
        return response.data.data.authentication
    }
}
