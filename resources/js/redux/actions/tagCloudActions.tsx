
import tagCloudSlice from "../slices/tagCloudSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {TagCloud} from "../types/types"
import TagCloudService from "../services/tagCloudService";

export const TagCloudActions = tagCloudSlice.actions

export const getAllTagCloud = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        if(getState().content.content.length == 0){
            const response:TagCloud[] = await TagCloudService.getAll()
            dispatch(TagCloudActions.setTagCloud(response))
        }
    }
}
