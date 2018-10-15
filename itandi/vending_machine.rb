
#投入した金額
@input = 0;
@totalInputMoney = 0

#釣り銭
@change = 0

#投入可能なコイン
@check_inputCoin = [10,50,100,500,1000]

#メニュー
@drinking_water  = { "coke" => [120,5] , "water" => [220,22] }

#総売り上げ
@sales = 0;   


#金額投入時
def put_money (coin)
    #coin 10円,50円,100円,500円,1000円
    #check the type of coins
    coin = coin.to_i
    if @check_inputCoin.include?(coin)
        @totalInputMoney += coin  
        print "*総投入金額 :  " 
        puts @totalInputMoney
        print "*飲料種 : " 
        puts @drinking_water
        puts "\n"
    else
        #それ以外の金額投入時
        @change = coin
        puts  "*10円100円500円1000円だけ可能です。"
        print "*総投入金額 :  " 
        puts @totalInputMoney
        print "*釣り銭 : " 
        puts @change
        puts "\n"
    end
end

#製品購入が終わったとき
def purchase
    @change = @totalInputMoney
    @totalInputMoney = 0
end


#製品選択時
def choice(product)
    puts product + "を入力しました。"
    if @drinking_water.key?(product) 
        if @drinking_water[product][0] > @totalInputMoney
            puts "*金額が足りません。"
        elsif @drinking_water[product][1] == 0
            puts "*すみません。数量がありません。"
        else
            @totalInputMoney = @totalInputMoney - @drinking_water[product][0]
            @drinking_water[product][1] = @drinking_water[product][1] - 1
            @sales = @sales + @drinking_water[product][0]
        end
        puts "*ご利用いただきありがとうございます。"
        print "*釣り銭: "
        puts @totalInputMoney
        print "*総売り上げ: "
        puts @sales
        puts "\n\n"

    else
        puts "*一致する飲み物がありません。"
    end
end

#製品追加時
def add()
    puts "\n\n"
    print "*製品名を入力してください。: "
    @add_name = gets.chomp()

    print "*価格を入力してください。: "
    @add_price = gets.chomp()

    print "*数量を入力してください。: "
    @add_quantity = gets.chomp()
    puts "\n"

    @drinking_water.store(@add_name, [@add_price,@add_quantity])
end

#値打ち
puts "\n\n"
puts "* 10円,50円,100円,500円,1000円が投入できます。"
puts "* menu : 現在飲料メニューが確認できます。"
puts "* add  : 飲み物が追加できます。"
puts "* end  : お釣りがもらえます。\n\n"

while @input != "end"
    
    #入力
    print "*入力してください。 : "

    @input = gets.chomp()

    puts "\n"

    #払い戻し
    if @input == "end"
        purchase()
        print "*釣り銭 : " 
        puts  @change
        print "*ご利用いただきありがとうございます。"     #거스름돈을 받을지 아니면 돈을 더 투입할지

    #メニュー見る
    elsif @input == "menu"
        puts @drinking_water

    #製品追加
    elsif @input == "add"
        add()

    #製品選択
    elsif @input.to_i == 0
        choice(@input)

    #現金投入
    else
        put_money(@input)
    end
end

