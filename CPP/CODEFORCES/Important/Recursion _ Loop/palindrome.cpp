//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

bool isPalindrome(string &str,int L,int R){
    if(L < R && !cnt && str[L]!=str[R]){
        str[L] = str[R];
        cnt++;
    }
    // cout << cnt << endl;
    // if(str.empty()) return false;
    if(L >= R && cnt != 0) return true; 
    return str[L] == str[R] && isPalindrome(str,L+1,R-1); 
}

int main()
{
      //        Bismillah
    string str;
    cin >> str;
    cout << (isPalindrome(str,0,str.length()-1) ? "YES" : "NO") << endl;
}