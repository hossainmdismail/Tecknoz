@extends('frontend.layout.legal')

@section('seo_key', 'terms-of-service')
@section('legal_heading', 'Terms of Service')
@section('title', 'Terms of Service | Tecknoz')
@section('description', 'Read the terms for using the Tecknoz website and sending project enquiries.')

@section('legal_body')
  <p>These terms concern use of the Tecknoz website. Project work is governed by the terms agreed for that engagement.</p>

  <h2>Website use</h2>
  <p>Use the website and its forms for lawful purposes. Provide accurate contact information, and only submit materials you are authorised to share. Do not use the forms to send spam, harmful content, or confidential project materials without arranging a suitable channel with us.</p>

  <h2>Project enquiries</h2>
  <p>Sending an enquiry or booking an introductory call starts a conversation with Tecknoz. Scope, deliverables, pricing, payment, timelines, and any confidentiality commitments are agreed separately before project work begins.</p>

  <h2>Website content and external links</h2>
  <p>Service descriptions and case studies are provided for general information. Third-party links, including scheduling and map services, are subject to the relevant provider’s terms.</p>

  <h2>Contact</h2>
  <p>Use the <a href="{{ route('contact') }}">Contact page</a> to ask about these terms. Our <a href="{{ route('privacy-policy') }}">Privacy Policy</a> explains how website enquiries and subscriptions are handled.</p>
@endsection
