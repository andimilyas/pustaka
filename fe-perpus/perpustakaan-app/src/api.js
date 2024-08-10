import axios from 'axios'

export const tokenApi = axios.create({
    baseURL: "/api/v1", 
    headers: {
        "Authorization" : `Bearer ${localStorage.getItem('token')}`
    },
}); 