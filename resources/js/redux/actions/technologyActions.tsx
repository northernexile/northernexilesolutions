
import technologySlice from '../slices/technologySlice'
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Technology} from "../types/types";
import TechnologyService from '../services/technologyService';

export const technologyActions = technologySlice.actions

export const getAllTechnologies =():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState): Promise<void> =>{
        if(getState().technology.technologies.length === 0){
            const response:Technology[] = await TechnologyService.getAllTechnologies()
            dispatch(technologyActions.setTechnologies(response))
        }
    }
}
