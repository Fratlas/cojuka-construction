<?php
/* Populate only verified official accounts. Empty values are never rendered as profiles. */
return ['social'=>[
 'facebook'=>env('COJUKA_FACEBOOK_URL'),
 'instagram'=>env('COJUKA_INSTAGRAM_URL'),
 'linkedin'=>env('COJUKA_LINKEDIN_URL'),
 'youtube'=>env('COJUKA_YOUTUBE_URL'),
 'tiktok'=>env('COJUKA_TIKTOK_URL')
],
 // Server-only credentials. Never expose these values to Blade or public JavaScript.
 'openai'=>[
  'key'=>env('OPENAI_API_KEY'),
  'model'=>env('OPENAI_MODEL','gpt-4o-mini'),
  'realtime_model'=>env('OPENAI_REALTIME_MODEL','gpt-realtime-mini'),
 ],
];