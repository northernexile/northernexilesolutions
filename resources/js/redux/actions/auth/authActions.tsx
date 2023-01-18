
import {createAsyncThunk} from "@reduxjs/toolkit";
import {Registration} from "../../types/types";
import RegistrationService from "../../services/registrationService";

export const registerUser = createAsyncThunk(
    'auth/register',
    async (registration:Registration, {rejectWithValue}) => {
        try {
            await RegistrationService.register(registration.name,registration.password,registration.email)
        } catch (error) {

        }
    }
)
