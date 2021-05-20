@extends('app2')
@section('content')

<div>
    <div class="h2">
        <span class="header-back-to"><a href="javascript&#x3a;&#x3b;" target="_self" class=" lfr-icon-item taglib-icon" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_rjus__column1__0" onclick="event.preventDefault();submitForm(document.hrefFm, 'https://www.sobatbangun.com/blog-detail/-/asset_publisher/99t4MkTPq9F0/')" data-senna-off="true"><span id="qfkd__column1__0"><svg class="lexicon-icon lexicon-icon-angle-left" focusable="false" role="img" title=""><use data-href="https://www.sobatbangun.com/o/sobatbangun-theme/images/lexicon/icons.svg#angle-left"></use><title>angle-left</title></svg></span><span class="taglib-text hide-accessible"></span></a></span><span class="header-title">10 Kesalahan Umum Saat Renovasi Rumah</span>
        <div class="pull-right"></div>
    </div>
    <div class="asset-full-content clearfix default-asset-publisher show-asset-title">
        <div class="asset-content" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_2503237">
            <div class="journal-content-article">
                <section class="py-main section-blog-detail">
                <div class="container">
                    <img src="{{ asset($blog->image_path)}}" class="img-fluid m-auto mb-4">
                    <div class="box-content">
                        <h2>{{$blog->title}}</h2>
                        <hr/><span class="note-blog text-gray-400">{{$blog->updated_at}}</span><hr/>
                        <div class="mt-4">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
                </section>
            </div>
            <div class="pull-right">
                <div class="taglib-social-bookmarks" id="ykmt_column1_0_socialBookmarks">
                    <div class="dropdown lfr-icon-menu ">
                        <a class="direction-right dropdown-toggle icon-monospaced " href="javascript:;" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_tiym_column1_0_menu" title="Berbagi"><span id="fehs__column1__0"><svg class="lexicon-icon lexicon-icon-share-alt" focusable="false" role="img" title=""><use data-href="https://www.sobatbangun.com/o/sobatbangun-theme/images/lexicon/icons.svg#share-alt"></use><title>share-alt</title></svg></span></a>
                        <script type="text/javascript">AUI().use("liferay-menu",function(a){Liferay.Menu.register("_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_tiym_column1_0_menu")});</script>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="" role="presentation">
                                <a href="https&#x3a;&#x2f;&#x2f;twitter&#x2e;com&#x2f;intent&#x2f;tweet&#x3f;text&#x3d;10&#x2b;Kesalahan&#x2b;Umum&#x2b;Saat&#x2b;Renovasi&#x2b;Rumah&#x26;tw_p&#x3d;tweetbutton&#x26;url&#x3d;https&#x3a;&#x2f;&#x2f;www&#x2e;sobatbangun&#x2e;com&#x2f;blog-detail&#x2f;-&#x2f;asset_publisher&#x2f;99t4MkTPq9F0&#x2f;content&#x2f;10-kesalahan-umum-saat-renovasi-rumah" target="_self" class="social-bookmark lfr-icon-item taglib-icon" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_tiym__column1__0__menu__twitter" role="menuitem"><span id="jbfs__column1__0"><i class="icon-twitter-sign"></i></span><span class="taglib-text-icon">Kericau</span></a>
                            </li>
                            <li class="" role="presentation">
                                <a href="http&#x3a;&#x2f;&#x2f;www&#x2e;facebook&#x2e;com&#x2f;sharer&#x2e;php&#x3f;u&#x3d;https&#x3a;&#x2f;&#x2f;www&#x2e;sobatbangun&#x2e;com&#x2f;blog-detail&#x2f;-&#x2f;asset_publisher&#x2f;99t4MkTPq9F0&#x2f;content&#x2f;10-kesalahan-umum-saat-renovasi-rumah" target="_self" class="social-bookmark lfr-icon-item taglib-icon" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_tiym__column1__0__menu__facebook" role="menuitem"><span id="uvlz__column1__0"><i class="icon-facebook-sign"></i></span><span class="taglib-text-icon">Facebook</span></a>
                            </li>
                            <li class="" role="presentation">
                                <a href="https&#x3a;&#x2f;&#x2f;plus&#x2e;google&#x2e;com&#x2f;share&#x3f;url&#x3d;https&#x3a;&#x2f;&#x2f;www&#x2e;sobatbangun&#x2e;com&#x2f;blog-detail&#x2f;-&#x2f;asset_publisher&#x2f;99t4MkTPq9F0&#x2f;content&#x2f;10-kesalahan-umum-saat-renovasi-rumah" target="_self" class="social-bookmark lfr-icon-item taglib-icon" id="_com_liferay_asset_publisher_web_portlet_AssetPublisherPortlet_INSTANCE_99t4MkTPq9F0_tiym__column1__0__menu__plusone" role="menuitem"><span id="ored__column1__0"><i class="icon-google-plus-sign"></i></span><span class="taglib-text-icon">Google</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection