
import {createAsyncThunk} from "@reduxjs/toolkit";
import {Login, Registration} from "../../types/types";
import RegistrationService from "../../services/registrationService";
import LoginService from "../../services/loginService";

export const registerUser = createAsyncThunk(
    'auth/register',
    async (registration:Registration, {rejectWithValue}) => {
        try {
            const result = await RegistrationService.register(
                registration.name,
                registration.email,
                registration.password,
                registration.confirmed
            )
        } catch (error) {
        }
    }
)

export const userLogin = createAsyncThunk(
    'auth/login',
    async (login:Login,{rejectWithValue}) => {
        try {
            const result = await LoginService.login(
                login.email,
                login.password
            )

            // @ts-ignore
            localStorage.setItem('userToken',result.token)

            return result

        } catch (error) {

        }
    }
)
