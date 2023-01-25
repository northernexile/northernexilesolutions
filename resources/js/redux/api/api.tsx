
import axios from "axios";

export default ()=>{
    // @ts-ignore
    const token = localStorage.getItem('userToken') ? localStorage.getItem('userToken') : null;

    if(token !== null) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    }
    return axios.create({
        baseURL:'/api/'
    })
}
