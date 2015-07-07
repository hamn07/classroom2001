
public class TwId {
	private String id="";
	private static final String sAlphabet="ABCDEFGHJKLMNPQRSTUVXYWZIO";
	
	static{
		System.out.println("C");
	}
	
	{
		System.out.println("B");
	}
	
	TwId(){
		this((int) (Math.random()*2)==0,(int) (Math.random()*26));
	}
	TwId(String id){
		this.id = id;
	}
	TwId(boolean isMale){
		this(isMale,(int) (Math.random()*26));
	}
	TwId(int area){
		this((int) (Math.random()*2)==0,area);
	}
	TwId(boolean isMale, int area){
		StringBuffer sb = new StringBuffer(sAlphabet.substring(area,area+1));
		sb.append((isMale)?"1":"2");
		for (int i=0;i<7;i++)
		{
			sb.append((int) (Math.random()*10));
		}
		for (int i=0;i<10;i++){
			if (isCheckOkRegex(sb.toString()+i)){
				sb.append(i);
				break;
			}
		}
		id=sb.toString();
		System.out.println(id);		
	}
	boolean isCheckOk(){
		if(id.length()!=10){
			return false;
		}
		System.out.println(Character.UPPERCASE_LETTER);
		System.out.println(Character.getType(id.charAt(0)));
		if(!Character.isAlphabetic(id.charAt(0))){
			if (Character.getType(id.charAt(0))!=Character.UPPERCASE_LETTER){
				return false;
			}			
		}
		if ("12".indexOf(id.charAt(1))==-1){
			return false;
		}
		for(int i=2;i<10;i++){
			if (!Character.isDigit(id.charAt(i))){
				return false;
			}
		}
		return true;
	}
	static boolean isCheckOkRegex(String id){
		if (!id.matches("^[A-Z][12][0-9]{8}$")){
			return false;
		}
		
		int temp = sAlphabet.indexOf(id.charAt(0))+10;
		
		int C1 = temp / 10;
		int C2 = temp % 10;
		int[] checkNum = {1,9,8,7,6,5,4,3,2,1,1};
		int sum=0;
		// 第一碼字母加權計算
		sum += C1*checkNum[0];
		sum += C2*checkNum[1];
		// 第二碼~第十碼數字加權計算
		for (int i=1;i<id.length();i++){
			sum += Character.getNumericValue(id.charAt(i))*checkNum[i+1];
		}
		// 判斷能否被10整除
		if (sum%10!=0){
			return false;
		}
		
		return true;
	}
	String getId(){
		return id;
	}
	
	public static void main(String[] args) {
		TwId id = new TwId(10);
		System.out.println(TwId.isCheckOkRegex(id.getId()));
		TwId.isCheckOkRegex("L143221414");
	}
}
