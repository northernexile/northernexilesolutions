
import {createSlice, PayloadAction} from "@reduxjs/toolkit";
import {registerUser,userLogin} from "../actions/auth/authActions";

// @ts-ignore
// @ts-ignore
// @ts-ignore
const userToken = localStorage.getItem('userToken') ? localStorage.getItem('userToken')
    : null

const initialState = {
    loading: false,
    userInfo: null,
    userToken,
    error: null,
    success: false,
}

const authSlice = createSlice({
    name: 'auth',
    initialState,
    reducers: {
        logout: (state) => {
            // @ts-ignore
            localStorage.removeItem('userToken') // delete token from storage
            state.loading = false
            state.userInfo = null
            state.userToken = null
            state.error = null
        },
        setCredentials: (state, { payload }) => {
            state.userInfo = payload
        },
    },
    extraReducers: builder => {
        builder.addCase(userLogin.pending, (state) =>{
            state.loading = true
            state.error = null
        })
        builder.addCase(userLogin.fulfilled,(state,action:PayloadAction<any>) =>{
            state.loading = false
            state.userInfo = action.payload
            state.userToken = action.payload.token
        })
        builder.addCase(userLogin.rejected, (state,{payload}) => {
            state.loading = false
            state.error = payload
        })
        builder.addCase(registerUser.pending,(state)=>{
            state.loading = true
            state.error = null
        })
        builder.addCase(registerUser.fulfilled,(state,{payload}) => {
            state.loading = false
            state.success = true
        })
        builder.addCase(registerUser.rejected, (state,{payload}) => {
            state.loading = false
            state.error = payload
        })
    }
})

export const { logout,setCredentials } = authSlice.actions
export default authSlice.reducer
