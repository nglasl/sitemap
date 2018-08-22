<% loop Children %>
	<% if not ExcludeFromSitemap %>
		<url>
			<loc>$AbsoluteLink</loc>
			<lastmod>{$LastEdited.Format(Y-m-d)}T{$LastEdited.Format(H:mm:ss)}:+00:00</lastmod>
		</url>
		<% if Children %>
			<% include XMLSitemapNextLevel %>
		<% end_if %>
	<% end_if %>
<% end_loop %>