//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define long long ll
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }

void solve(){ }

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    int n,k,k_good=0;
    cin >> n >> k;
    string s,c = "0123456789";

    while(n--){
        cin >> s;
        int count = 0; 
        for(int i = 0; i <= k; i++){
            int r = s.find(c[i]);
            if(r != -1){
                count++;
                r = -1;
            }
        }

        if(count == k+1) k_good++;
    }

    cout << k_good << "\n";
}