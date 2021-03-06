package com.mxgraph.io.gliffy.model;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class GliffyText
{
	//places the text in the middle of the line
	public static Double DEFAULT_LINE_T_VALUE = 0.5; 
	
	private String html;

	private String valign;
	
	//extracted from html
	private String halign;

	private String vposition;

	private String hposition;

	private Integer paddingLeft;

	private Integer paddingRight;

	private Integer paddingBottom;

	private Integer paddingTop;
	
	public Double lineTValue = DEFAULT_LINE_T_VALUE;

	public Integer linePerpValue;

	private static Pattern pattern = Pattern.compile("<p(.*?)<\\/p>");

	private static Pattern textAlign = Pattern.compile(".*(text-align: ?(left|center|right);).*", Pattern.DOTALL);

	public GliffyText()
	{
	}

	public String getHtml()
	{
		halign = halign == null ? getHorizontalTextAlignment() : halign;
		return replaceParagraphWithDiv(html);
	}

	//this is never invoked by Gson builder
	public void setHtml(String html)
	{
	}

	public String getStyle()
	{
		StringBuilder sb = new StringBuilder();

		//vertical label position
		if (vposition.equals("above"))
		{
			sb.append("verticalLabelPosition=top;").append(
					"verticalAlign=bottom;");
		}
		else if (vposition.equals("below"))
		{
			sb.append("verticalLabelPosition=bottom;").append(
					"verticalAlign=top;");
		}
		else if (vposition.equals("none"))
		{
			sb.append("verticalAlign=").append(valign).append(";");
		}

		if (hposition.equals("left"))
		{
			sb.append("labelPosition=left;").append("align=right;");
		}
		else if (hposition.equals("right"))
		{
			sb.append("labelPosition=right;").append("align=left;");
		}
		else if (hposition.equals("none"))
		{
			String hAlign = getHorizontalTextAlignment();
			if (hAlign != null)
			{
				sb.append("align=").append(hAlign).append(";");
			}
		}

		sb.append("spacingLeft=").append(paddingLeft).append(";");
		sb.append("spacingRight=").append(paddingRight).append(";");
		sb.append("spacingTop=").append(paddingTop).append(";");
		sb.append("spacingBottom=").append(paddingBottom).append(";");

		return sb.toString();
	}

	private String replaceParagraphWithDiv(String html)
	{
		Matcher m = pattern.matcher(html);
		StringBuilder sb = new StringBuilder();
		while (m.find())
		{
			sb.append("<div" + m.group(1) + "</div>");
		}

		return sb.length() > 0 ? sb.toString() : html;
	}

	/**
	 * Extracts horizontal text alignment from html and removes it
	 * so it does not interfere with alignment set in mxCell style
	 * @return horizontal text alignment or null if there is none
	 */
	private String getHorizontalTextAlignment()
	{
		Matcher m = textAlign.matcher(html);

		if (m.matches())
		{
			html = html.replaceAll("text-align: ?\\w*;", "");
			return m.group(2);
		}

		return null;
	}

}
