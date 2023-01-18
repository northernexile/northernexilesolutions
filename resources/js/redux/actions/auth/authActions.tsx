
import {createAsyncThunk} from "@reduxjs/toolkit";
import {Registration} from "../../types/types";

export const registerUser = createAsyncThunk(
    'auth/register',
    async (Registration, {rejectWithValue}) => {
        try {

        } catch (error) {

        }
    }
)
