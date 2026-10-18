<?php
/* Populate only verified official accounts. Empty values are never rendered as profiles. */
return ['social'=>[
 'facebook'=>env('COJUKA_FACEBOOK_URL'),
 'instagram'=>env('COJUKA_INSTAGRAM_URL'),
 'linkedin'=>env('COJUKA_LINKEDIN_URL'),
 'youtube'=>env('COJUKA_YOUTUBE_URL'),
 'tiktok'=>env('COJUKA_TIKTOK_URL')
]];