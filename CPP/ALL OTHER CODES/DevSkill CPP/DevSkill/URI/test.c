#include <stdio.h>
#define PI 3.14
int main(){
    int radius,height;
    double temp,answer;
    scanf("%d %d",&radius,&height);

    temp = radius/2.0;
    answer = PI * temp*temp * height;

    printf("%.2lf cm^3\n",answer);
    
}



// #include <bits/stdc++.h>
// using namespace std;

// int main()
// {
//     queue<string>digits,opperand;
//     string str,temp;
//     getline(cin, str);
//     str.append(" ");
//     int i = 0;
//     char ch;
    
//     while(i != str.size()){
//         if(str[i] != ' '){
            
//             string tstr,opStr;
//             // tstr.push_back(ch);
//             // temp.append(tstr);
//             if(str[i] != '+' || str[i] != '*' || str[i] != '/' || str[i] != '-' ){
//                 ch = str[i];
//                 ch = str[i];
//                 tstr.push_back(ch);
//                 temp.append(tstr);
//             }
//             // else{
//             //     opStr.push_back(ch);
//             //     // temp.append(opStr);
//             //     // temp = "";
//             // }
            
//         }

//         if(str[i] == ' '){
//             if(temp != "+" || temp != "*" || temp != "/" || temp != "-")
//             digits.push(temp);
//             // else opperand.push(temp);
//             temp = "";
//             // str.erase(str[i]);
//         }
//         i++;
//         // cout << i << endl;
//     }

//     while(!digits.empty()){
//         cout << digits.front() << " ";
//         digits.pop();
//     }
    
// }


// //        Sample Input
// //        123 1254 + 1.254 * 45.87 /
// //        5 4 +
// //        5 4 + 1 + 2 + 12 -
// //        3 2 * 1 - 2 / 3.1415 +

// //        Sample Output
// //        37.6446
// //        9.0000
// //        0.0000
// //        5.6415



