import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {Chip} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../controls/rows/FormRowInput";
import {useFormHooks} from "../../../hooks/useFormHooks";
import {addTag, deleteTag, getAllTag} from "../../../redux/actions/tagActions";

const TagList = () => {
    const {createButton} = useFormHooks()
    const {control,handleSubmit} = useForm()
    const dispatch = useAppDispatch();
    const tags = useAppSelector(state => state.tag.tags)

    useEffect(() => {
        handleLoad()
    }, []);

    const handleLoad = () => {
        dispatch(getAllTag())
        console.log(tags)
    }

    const handleDelete = (tag) => {
        dispatch(deleteTag(tag))
            .then(() => dispatch(getAllTag()))
    }

    const handleCreate = (tag) => {
        dispatch(addTag(tag))
            .then(() => dispatch(getAllTag()))
    }

    const submitForm = (data) => {
        handleCreate(data)
    }

    const form = () => {
        return <FormProvider {...form}>
            <form onSubmit={handleSubmit(submitForm)}>
                <FormRowInput name={`name`} label={`Tag name`} control={control} />
                <div className={`form-row`}>
                    {createButton()}
                </div>
            </form>
        </FormProvider>
    }

    const tagList = () => {
        return (<div className={`tag-chip-list`}>
                {tags.map((tag, index) => (
                    <Chip
                        style={{marginRight: 2,marginBottom:2}}
                        label={tag.name}
                        onDelete={() => {
                            handleDelete(tag)
                        }}
                        key={`sector-chip-${tag.id}`}
                    />
                ))}
            </div>

        )
    }

    return (
        <div className={`tag-list tag-chips`}>
            <div className={`tag-chip-create`}>
                {form()}
            </div>
            {tags && tagList()}
        </div>
    )
}

export default TagList
