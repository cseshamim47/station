//Time complexity : O(r*c);

#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;

    while(t--){
        int r,c,flag = 0;
        cin >> r >> c;
        r += 1; c += 1;
        char arr[r][c];
        char fst = '.';
        int fstIdxi = 0;
        int fstIdxj = 0;

        for(int i = 1; i < r; i++){
            for(int j = 1; j < c; j++){
                cin >> arr[i][j];
                if(arr[i][j] != fst && fst == '.'){
                    fstIdxi = i; 
                    fstIdxj = j;
                    fst = arr[i][j]; 
                } 
            }
        }

        for(int i = 1; i < r; i++){
            for(int j = 1; j < c; j++){
                if((fstIdxi+fstIdxj == 0) && fst == '.'){
                    if((i+j) % 2 != 0) arr[i][j] = 'W';
                    else if((i+j) % 2 == 0) arr[i][j] = 'R';
                    continue;
                }
                if((fstIdxi+fstIdxj) % 2 != 0 && (i+j) % 2 != 0){
                    if(arr[i][j] == '.' || arr[i][j] == fst) arr[i][j] = fst;
                    else{
                        cout << "NO\n";
                        flag = 1;
                        break;
                    }
                }else if((fstIdxi+fstIdxj) % 2 == 0 && (i+j) % 2 == 0){
                    if(arr[i][j] == '.' || arr[i][j] == fst) arr[i][j] = fst;
                    else{
                        cout << "NO\n";
                        flag = 1;
                        break;
                    }
                }else{
                    if(fst == 'R' && (arr[i][j] == '.' || arr[i][j] == 'W')) arr[i][j] = 'W';
                    else if(fst == 'W' && (arr[i][j] == '.' || arr[i][j] == 'R')) arr[i][j] = 'R';
                    else{
                        cout << "NO\n";
                        flag = 1;
                        break;
                    }
                }
            }
            if(flag) break;
        }

        if(!flag){
            cout << "YES\n";
            for(int i = 1; i < r; i++){
                for(int j = 1; j < c; j++){
                    cout << arr[i][j];
                }
                printf("\n");
            }
        }
    }
    
}