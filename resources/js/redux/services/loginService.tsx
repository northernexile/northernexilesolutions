

import Api from '../api/api'

export default {

    async login(email,password){
        const response = await Api().post(
            `auth/login`,
            {email:email,password:password})
        return response.data.data.authentication
    }
}
