using System;
					
public class Program
{
	public static void Main()
	{
		Console.WriteLine("Hello World");
		Console.WriteLine(retrieveFromJSON("senderFullName","{\"name\":\"get_my_rooms\",\"content\":[{\"roomId\":\"5_3232\",\"senderUserId\":\"5\",\"senderFullName\":\"Orhann\",\"receiverUserId\":\"3232\",\"receiverFullName\":\"\",\"createTime\":1,593337E+12,\"messages\":[{\"userId\":\"1\",\"userName\":\"OrhanTUTUM\",\"content\":\"erwrwe\"},{\"userId\":\"1\",\"userName\":\"OrhanTUTUM\",\"content\":\"twerewrewr\"}]}]}"));
	}
	
	public  static String retrieveFromJSON(string key, string JSONstring)
	{
		string[] words = JSONstring.Split(new string[] {"\""+key+"\":"}, StringSplitOptions.None);
		string[] result = words[1].Split(',');
		
		return result[0].TrimEnd('}');
	}
	
	// "\""+key+"\":"
}
