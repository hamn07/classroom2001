import java.util.Arrays;
import java.util.Random;

public class Hello {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		System.out.println("Hello, World");
		byte 成績 = 127;
		System.out.println(成績);
		/*
		 * for迴圈的底層跑法
		 */
		int i = 0;
		for (System.out.println("step 1"); i < 20; System.out.println("step4")) {
			System.out.println("step3-".concat(String.valueOf(i++)));
		}
		/*
		 * 九九乘法表
		 */
		for (int k = 0; k < 2; k++) {
			for (int j = 1; j <= 9; j++) {
				for (i = 2 + k * 4; i <= 5 + k * 4; i++) {
					System.out.print(i + " x " + j + " = " + (i * j) + "\t");
				}
				System.out.println();
			}
			System.out.println();
		}
		/*
		 * 陣列array
		 * 物件=>new
		 * ．型態[] 變數名稱; int[] a; int a[]; int[] a[];
		 */
		boolean[] a;
		a = new boolean[4];
		for (i = 0; i < a.length; i++) {
			System.out.println(a[i]);
		}
		// foreach用法
		for (boolean v : a){
			System.out.println(v);
		}
		// example: 加鉛的dice
		int[] p = new int[6];
		for (i=0;i<100000;i++){
			int point = (int)(Math.random()*9+1);
			point = (point>=7)?point-3:point;
			p[point-1]++;
		}
		for (i=0;i<p.length;i++){
			System.out.println((i+1)+" : "+p[i]);
		}
		// example: 發撲克牌
		int[] poker = new int[52];
		// 1. 洗牌
		for(i=0;i<poker.length;i++){
			int r = (int)(Math.random()*52);
			poker[i]=r;
			//...
		}
		// 2. 發牌
		int[][] player = new int[4][13];
		for(i=0;i<poker.length;i++){
			player[i%4][i/4]=poker[i];
		}
		// 3.攤牌
		String[] flower = {"黑桃","紅心","方塊","梅花"};
		String[] value = {"A","2","3","4","5","6","7","8","9","10","J","Q","K"};
		for(i=0;i<player.length;i++){
			Arrays.sort(player[i]);
			for (int j=0;j<player[i].length;j++){
				System.out.print(flower[player[i][j]/13]+value[player[i][j]%13]+"\t");
			}
			System.out.println();
		}
		/*
		 * while迴圈
		 */
		int iResult=0;
		i=1;
		while(i<=10){
			iResult+=i;
			i++;
		}
		System.out.println(iResult);
		/*
		 * do while迴圈
		 */
		iResult=0;
		i=1;
		do{
			iResult+=i;
		}while(i++<10);
		System.out.println(iResult);
		/*
		 *  物件導向
		 */
		Bike b = new Bike();
		b.upSpeed();
		
		System.out.println(b.getSpeed());
		System.out.println();
		
		String s1 = new String();
		byte[] b1 = {97,98,99,100};
		String s2 = new String(b1);
		
		System.out.println(s1);
		System.out.println(s2);
	}
}
