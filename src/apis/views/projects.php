<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\APIs\Views\Projects;

/**
 * Filters an array of projects by name.
 *
 * @param string $search A substring that exists inside the project name.
 * @param array<array<string, mixed>> $projects An indexed array of associative arrays that represent projects.
 *
 * @return array<array<string, mixed>> Filtered projects.
 */
function filter_projects_by_name(string $search, array $projects): array
{
    $filteredProjects = [];

    foreach ($projects as $project)
    {
        if (!project_array_contains_title($project))
        {
            continue;
        }

        $lowercaseProjectNamne = strtolower($project['title']);
        $lowercaseSearch = strtolower($search);

        if (strpos($lowercaseProjectNamne, $lowercaseSearch) !== false)
        {
            $filteredProjects[] = $project;
        }
    }

    return $filteredProjects;
}

/**
 * @param array<string, mixed> $project An associative array that represents a project.
 */
function project_array_contains_title(array $project): bool
{
    if (!is_array($project))
    {
        false;
    }

    if (!array_key_exists('title', $project) || !is_string($project['title']))
    {
        false;
    }

    return true;
}

/**
 * Filters an array of projects by tags.
 *
 * @param array<string> $tags An indexed array of tag strings.
 * @param array<array<string, mixed>> $projects An indexed array of associative arrays that represent projects.
 *
 * @return array<array<string, mixed>> Filtered projects.
 */
function filter_projects_by_tags(array $tags, array $projects): array
{
    $filteredProjects = [];

    foreach ($projects as $project)
    {
        if (!project_array_contains_tags($project))
        {
            continue;
        }

        if (!project_tags_matches_given_tags($tags, $project))
        {
            continue;
        }

        $filteredProjects[] = $project;
    }

    return $filteredProjects;
}

/**
 * @param array<string, mixed> $project An associative array that represents a project.
 */
function project_array_contains_tags(array $project): bool
{
    if (!is_array($project))
    {
        false;
    }

    if (!array_key_exists('tags', $project) || !is_array($project['tags']))
    {
        false;
    }

    return true;
}

/**
 * Constructs a new tag array of a project that only consists out of lowercase values.
 *
 * @param array<string, mixed> $project An associative array that represents a project.
 *
 * @return array<string> A converted array.
 */
function project_tags_to_lowercase(array $project): array
{
    if (!project_array_contains_tags($project))
    {
        return [];
    }

    $convertedArray = [];

    foreach ($project['tags'] as $tag)
    {
        $convertedArray[] = strtolower($tag);
    }

    return $convertedArray;
}

/**
 * @param array<string> $tags An indexed array of tag strings.
 * @param array<array<string, mixed>> $project An indexed array of associative arrays that represent projects.
 */
function project_tags_matches_given_tags(array $tags, array $project): bool
{
    foreach ($tags as $tag)
    {
        if (!in_array(strtolower($tag), project_tags_to_lowercase($project), true))
        {
            return false;
        }
    }

    return true;
}
