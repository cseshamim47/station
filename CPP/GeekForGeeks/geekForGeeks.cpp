#include <bits/stdc++.h>
using namespace std;

void method(vector<vector<int>> M, int N){
    int count = 0;
        int ans = 0;
    
        for(int i = 1; i < N; i++){
            for(int j = i-1; j >= 0; j--){
                 if(M[0][i] == M[0][j]) M[0][i] = -1;
            }
        }
        
        // for(int i = 0; i < N; i++){
        // for(int j = 0; j < N; j++){
        //     cout << M[i][j] << " ";
        // }
        // cout << endl;
        // }
    
    
       for(int i = 0; i < N; i++){
           count = 1;
           for(int j = 1; j < N; j++){
                for(int k = 0; k < N; k++){
                       if(M[0][i] == M[j][k]){
                           count++;
                           cout << count << endl;
                           break;
                       }
                }
           }
          if(count == N) ans++; 
          
       }
       cout << ans;
}

int main()
{
    int N;
    cin >> N;
    vector <vector <int> > M(N, vector<int>(N, 0));

    for(int i = 0; i < N; i++){
        for(int j = 0; j < N; j++){
            cin >> M[i][j];
        }
    }



    method(M,N);













    // for(int i = 0; i < N; i++){
    //     for(int j = 0; j < N; j++){
    //         cout << M[i][j] << " ";
    //     }
    //     cout << endl;
    // }
    
    
    cout << endl;
}