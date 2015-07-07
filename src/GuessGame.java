import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.JTextField;


public class GuessGame extends JFrame{
	private JButton guess;
	private JTextField number;
	private JTextArea hist;
	
	GuessGame(){
		super("猜數字遊戲");

//		setLayout(new FlowLayout(FlowLayout.LEFT));
		setLayout(new BorderLayout());
		guess = new JButton("猜");
		guess.addActionListener(new ActionListener() {
			
			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				pressGuess();
			}
		});
		
		number = new JTextField(10);
		JPanel jp = new JPanel(new FlowLayout(FlowLayout.LEFT));
		jp.add(number); jp.add(guess);
		add(jp, BorderLayout.NORTH);

		hist = new JTextArea();
		add(hist, BorderLayout.CENTER);
		
		setSize(480, 320);
		setVisible(true);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
	}
	void pressGuess(){
		System.out.println(number.getText());
	}
	String createAnswer(int d){
		return "";
	}
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new GuessGame();
	}

}