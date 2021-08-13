#include <bits/stdc++.h>
using namespace std;
string bigIntMultiplication(string s1, string s2);
int main()
{
    string str1;
    string str2;

    cin >> str1 >> str2;

    if((str1[0] == '-' || str2[0] == '-') &&
       (str1[0] != '-' || str2[0] != '-'))
       cout << "-";
    if(str1.at(0) == '-')
       str1 = str1.substr(1);
    if(str2.at(0) == '-')
       str2 = str2.substr(1);

    cout << bigIntMultiplication(str1,str2);

}

string bigIntMultiplication(string s1, string s2){
    int lenS1 = s1.size();
    int lenS2 = s2.size();
    if(lenS1 == 0 || lenS2 == 0) return "0";

    vector<int> result(lenS1 + lenS2,0);

    int idxS1 = 0;
    int idxS2 = 0;

    for(int i = lenS1-1; i>=0; i--){
        int carry = 0; 
        int n1 = s1[i]-'0';

        idxS2 = 0;

        for(int i = lenS2-1; i>=0; i--){
            int n2 = s2[i]-'0';
            int sum = n1*n2 + result[idxS1+idxS2] + carry;
            carry = sum/10;
            result[idxS1+idxS2] = sum % 10;
            idxS2++;
        }
        if(carry>0){
            result[idxS1+idxS2] += carry;
        }
        idxS1++;
    }
    int i = result.size()-1;
    while(i>=0 && result[i]==0) i--;
    if(i==-1) return "0";

    string s = "";
    while(i>=0){
        s += to_string(result[i]);
        i--;
    }

    return s;

}