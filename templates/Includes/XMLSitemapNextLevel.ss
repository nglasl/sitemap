<% loop Children %>
	<% if not ExcludeFromSitemap %>
		<url>
			<loc>$AbsoluteLink</loc>
			<lastmod>{$LastEdited.Format(Y-MM-dd)}T{$LastEdited.Format(H:mm:ss)}+00:00</lastmod>
		</url>
		<% if Children %>
			<% include XMLSitemapNextLevel %>
		<% end_if %>
	<% end_if %>
<% end_loop %>