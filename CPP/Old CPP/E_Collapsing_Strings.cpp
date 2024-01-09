#include <bits/stdc++.h>
using namespace std;

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    string str[n+1];
    for(int i = 1; i <= n; i++)
    {
        cin >> str[i];
    }

    for(int i = 1; i <= n; i++)
    {
        for(int j = 1; j <= n; j++)
        {
            cout << str[i] << " " << str[j] << endl;
        }
    }
}


// ********** STRING HASHING *************

const int MAXN=1000006;
namespace DoubleHash{
    int P[2][MAXN];
    int H[2][MAXN];
    int R[2][MAXN];
    int base[2];
    int mod[2];
    void gen(){
        base[0] = 1949313259ll;
        base[1] = 1997293877ll;
        mod[0]  = 2091573227ll;
        mod[1]  = 2117566807ll;
        for(int j=0;j<2;j++){
            for(int i=0;i<MAXN;i++){
                H[j][i]=R[j][i] = 0ll;
                P[j][i] = 1ll;
            }
        }
        for(int j=0;j<2;j++){
            for(int i=1;i<MAXN;i++){
                P[j][i] = (P[j][i-1] * base[j])%mod[j];
            }
        }
    }
    void make_hash(string arr){
        int len = arr.size();
        for(int j=0;j<2;j++){
            for (int i = 1; i <= len; i++)H[j][i] = (H[j][i - 1] * base[j] + arr[i - 1] + 1007) % mod[j];
//            for (int i = len; i >= 1; i--)R[j][i] = (R[j][i + 1] * base[j] + arr[i - 1] + 1007) % mod[j];
        }
    }
    inline int range_hash(int l,int r,int idx){
        int hashval = H[idx][r + 1] - ((long long)P[idx][r - l + 1] * H[idx][l] % mod[idx]);
        return (hashval < 0 ? hashval + mod[idx] : hashval);
    }
    inline int reverse_hash(int l,int r,int idx){
        int hashval = R[idx][l + 1] - ((long long)P[idx][r - l + 1] * R[idx][r + 2] % mod[idx]);
        return (hashval < 0 ? hashval + mod[idx] : hashval);
    }
    inline int range_dhash(int l,int r){
        int x = range_hash(l,r,0);
        return (x<<32)^range_hash(l,r,1);
    }
    inline int reverse_dhash(int l,int r){
        int x = reverse_hash(l,r,0);
        return (x<<32)^reverse_hash(l,r,1);
    }
}


char str1[MAXN];

using namespace DoubleHash;

// aba aba -> 0
// aba ab -> 1
// aba ba -> 5
// ab aba -> 5
// ab ab -> 4
// ab ba -> 0
// ba aba -> 1
// ba ab -> 0
// ba ba -> 4


