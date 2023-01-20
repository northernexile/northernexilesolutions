
import Api from '../api/api'

export default {

    register: async function (name, email, password, confirmed) {
        const response = await Api().post(
            `auth/register`,
            {name: name, email: email, password: password, password_confirmation: confirmed})
        return response.data.data.authentication
    }
}
