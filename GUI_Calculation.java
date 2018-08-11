package GUU;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.Arrays;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

class MyFrame extends JFrame {
	JLabel Jl1, Jl2;
	String ToTalFormula = "";
	String Num = "";
	String check;
	int  result;
	int count = 0;
	int value = 0;
	boolean bool = false;

	public MyFrame() {

		setLayout(new BorderLayout());
		setTitle("Calculation");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		Jl1 = new JLabel();
		Jl1.setPreferredSize(new Dimension(300, 30));
		Jl1.setBackground(Color.WHITE);
		Jl1.setHorizontalAlignment(JLabel.RIGHT);
		Jl1.setOpaque(true);
		Jl1.setEnabled(false);
		JPanel panel1 = new JPanel();
		panel1.add(Jl1);   
		add(panel1, BorderLayout.NORTH);

		Jl2 = new JLabel();
		Jl2.setPreferredSize(new Dimension(300, 30));
		Jl2.setBackground(Color.WHITE);
		Jl2.setHorizontalAlignment(JLabel.RIGHT);
		Jl2.setOpaque(true);
		Jl2.setEnabled(false);
		JPanel panel2 = new JPanel();
		panel2.add(Jl2);
		add(panel2, BorderLayout.CENTER);

		JPanel panel3 = new JPanel();
		panel3.setLayout(new GridLayout(5, 4));
		String arr[] = { "CE", "C", "<-", "/", "7", "8", "9", "X", "4", "5", "6", "+", "1", "2", "3", "-", "", "0", "","=" };

		for (int i = 0; i < 20; i++) {

			switch (arr[i]) {
			case "":
				JButton Btn0 = new JButton("");
				panel3.add(Btn0);
				break;
			case "CE":
				JButton Btn1 = new JButton("CE");
				Btn1.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						Jl2.setText("");
					}
				});
				panel3.add(Btn1);
				break;
			case "C":
				JButton Btn2 = new JButton("C");
				Btn2.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						count = 0;
						Jl1.setText("");
						Jl2.setText("");
					}
				});
				panel3.add(Btn2);
				break;
			case "<-":
				
				JButton Btn3 = new JButton("<-");
				panel3.add(Btn3);

				Btn3.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						if(bool){
							
						}else{
							Num = Jl2.getText();
							Num = Num.substring(0, Num.length()-1);
							Jl2.setText(Num);
						}
					}
				});
				
				break;
				
			case "/":
				JButton Btn4 = new JButton("/");
				Btn4.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						ToTalFormula = Jl1.getText();
						Num = Jl2.getText();
						Jl1.setText(ToTalFormula + " /");
						ToTalFormula = Jl1.getText();
						if(count>1){
							result = calculation_J(ToTalFormula,Num);
							String p = String.valueOf(result);
							Jl2.setText(p);
						}
						bool = true;		
					}
				});
				panel3.add(Btn4);
				break;
				
			case "X":
				JButton Btn5 = new JButton("X");
				Btn5.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						ToTalFormula = Jl1.getText();
						Num = Jl2.getText();
						Jl1.setText(ToTalFormula + " X");
						ToTalFormula = Jl1.getText();
						if(count>1){
							result = calculation_J(ToTalFormula,Num);
							String p = String.valueOf(result);
							Jl2.setText(p);
						}
						bool = true;		
					}
				});
				panel3.add(Btn5);
				break;
				
			case "-":
				JButton Btn6 = new JButton("-");
				Btn6.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						ToTalFormula = Jl1.getText();
						Num = Jl2.getText();
						Jl1.setText(ToTalFormula + " -");
						ToTalFormula = Jl1.getText();
						if(count>1){
							result = calculation_J(ToTalFormula,Num);
							String p = String.valueOf(result);
							Jl2.setText(p);
						}
						bool = true;		
					}
				});
				panel3.add(Btn6);
				break;
				
			case "+":
				JButton Btn7 = new JButton("+");
				Btn7.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						ToTalFormula = Jl1.getText();
						Num = Jl2.getText();
						Jl1.setText(ToTalFormula + " +");
						ToTalFormula = Jl1.getText();
						if(count>1){
							result = calculation_J(ToTalFormula,Num);
							String p = String.valueOf(result);
							Jl2.setText(p);
						}
						bool = true;		
					}
				});
				panel3.add(Btn7);
				break;
				
			case "=":
				JButton Btn8 = new JButton("=");
				Btn8.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						ToTalFormula = Jl1.getText();
						Num = Jl2.getText();
						if(count>1){
							result = equal(ToTalFormula,Num);
							String p = String.valueOf(result);
							Jl2.setText(p);
						}
						bool = true;	
					}
				});
				panel3.add(Btn8);
				break;
				
			default:
				JButton Btn9 = new JButton(arr[i]);
				Btn9.addMouseListener(new MouseAdapter() {
					@Override
					public void mouseClicked(MouseEvent e) {
						count++;
						if(bool){
							ToTalFormula = Jl1.getText();
							Num = Jl2.getText();
							Jl1.setText(ToTalFormula + Btn9.getText());
							ToTalFormula = Jl1.getText();
							Jl2.setText(Btn9.getText());
							bool = false;
						}else{
							ToTalFormula = Jl1.getText();
							Num = Jl2.getText();
							Jl1.setText(ToTalFormula + Btn9.getText());
							Jl2.setText(Num + Btn9.getText());		
						}
					
					}
				});
				panel3.add(Btn9);
			}
		}
		add(panel3, BorderLayout.SOUTH);
		pack();
		setVisible(true);
	}
	
	public int calculation_J(String arg1, String arg2){
		String sign = "";
		arg1 = arg1.replaceAll(" " , "");
		String list[] = arg1.split("[+]|[-]|[/]|[X]");
		
		
		String TotalList[] = arg1.split("");
		
		
		for( int q = TotalList.length-1 ; q >= 0 ; q-- ){
			if( q < TotalList.length-1){
				if(TotalList[q].equals("X") || TotalList[q].equals("/") || TotalList[q].equals("+")||TotalList[q].equals("-")){
					sign = TotalList[q];
					break;
				}
			}
		}
		
		if(count == 2){
			switch(sign){
			case "+":
				 value = Integer.parseInt(list[0]) + Integer.parseInt(list[1]);
				 break;
			case "-":
				value = Integer.parseInt(list[0]) - Integer.parseInt(list[1]);	
				break;
			case "X":
				value = Integer.parseInt(list[0]) * Integer.parseInt(list[1]);	
				break;
			case "/":
				value = Integer.parseInt(list[0]) / Integer.parseInt(list[1]);	
				break;
			}
		}else{
			switch(sign){
			case "+":
				 value = value + Integer.parseInt(arg2);	
				 break;
			case "-":
				value = value - Integer.parseInt(arg2);	
				break;
			case "X":
				value = value * Integer.parseInt(arg2);	
				
				break;
			case "/":
				value = value / Integer.parseInt(arg2);	
				break;
			}
		}
		 bool = false;
		return value;
	}
	
	public int equal(String arg1, String arg2){
		String sign = "";
		arg1 = arg1.replaceAll(" " , "");
		String list[] = arg1.split("[+]|[-]|[/]|[X]");
		
		
		String TotalList[] = arg1.split("");
		
		
		for( int q = TotalList.length-1 ; q >= 0 ; q-- ){
				if(TotalList[q].equals("X") || TotalList[q].equals("/") || TotalList[q].equals("+")||TotalList[q].equals("-")){
					sign = TotalList[q];
					break;
				}
				
		}
		
		if(count == 2){
			switch(sign){
			case "+":
				 value = Integer.parseInt(list[0]) + Integer.parseInt(list[1]);	
				 break;
			case "-":
				value = Integer.parseInt(list[0]) - Integer.parseInt(list[1]);	
				break;
			case "X":
				value = Integer.parseInt(list[0]) * Integer.parseInt(list[1]);	
				break;
			case "/":
				value = Integer.parseInt(list[0]) / Integer.parseInt(list[1]);	
				break;
			}
	
		}else{
			switch(sign){
			case "+":
				 value = value + Integer.parseInt(arg2);	
				 break;
			case "-":
				value = value - Integer.parseInt(arg2);	
				break;
			case "X":
				value = value * Integer.parseInt(arg2);	
				
				break;
			case "/":
				value = value / Integer.parseInt(arg2);	
				break;
			}
		}
		 bool = false;
		return value;
	}
}

public class GUI_Calculation {
	public static void main(String args[]) {
		MyFrame f = new MyFrame();
	}
}
