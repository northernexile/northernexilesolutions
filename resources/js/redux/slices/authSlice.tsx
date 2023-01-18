
import {createSlice} from "@reduxjs/toolkit";
import {registerUser} from "../actions/auth/authActions";

const initialState = {
    loading: false,
    userInfo: {},
    userToken: null,
    error: null,
    success: false,
}

const authSlice = createSlice({
    name: 'auth',
    initialState,
    reducers: {},
})

export default authSlice.reducer
